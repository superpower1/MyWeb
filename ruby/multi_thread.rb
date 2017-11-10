def foo
  10.times { puts "Call foo at #{Time.now}" }
  sleep(1.0)
end

def bar
  10.times { puts "Call bar at #{Time.now}" }
  sleep(1.0)
end

t1 = Thread.new{ foo() }
t2 = Thread.new{ bar() }
# 通过 Thread.Join 方法来执行线程，这个方法会挂起主线程，直到当前线程执行完毕
t2.join
t1.join

count1 = count2 = 0

a = Thread.new do
    loop { count1 += 1 }
  end
# 优先级高
a.priority = -1

b = Thread.new do
    loop { count2 += 1 }
  end
b.priority = -2

sleep 1
puts count1,count2

# 如果不写join则有可能子线程发生异常但主线程已经执行完毕所以不会跳出，如果需要考虑每个子线程发生异常之后都跳出则需要：
# Thread.abort_on_exception = true
# t1 = Thread.new do
#   puts "In new thread"
#   raise "Exception from thread"
# end
# sleep 1
# puts "not reached"

mutex = Mutex.new

c1 = c2 = 0
diff = 0
counter = Thread.new do
  loop do
    # 使用synchronize方法就可以保证里面的代码在执行的时候不会有其他的线程干扰
    mutex.synchronize do
      c1 += 1
      c2 += 1
    end
  end
end

spy = Thread.new do
  loop do
    mutex.synchronize do
      diff += (c1 - c2).abs
    end
  end
end

sleep 2
mutex.lock
p "count1: #{c1}"
p "count2: #{c2}"
p "diff: #{diff}"

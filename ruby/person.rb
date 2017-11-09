class Person
  attr_reader :name

  include Comparable

  def initialize(name)
    @name = name

  end

  # 在这里声明了Person的实例判断大小的方法
  def <=> other
    # 使用ruby对string的大小判断方法
    self.name <=> other.name
  end

end

p1 = Person.new('A')
p2 = Person.new('B')
p3 = Person.new('C')

puts p1 > p2 # false
puts p2.between?(p1,p3) # 由于引入了Comparable模块所以可以使用Comparable里的between方法

class People
  attr_reader :people

  include Enumerable

  def initialize(people)
    @people = people
  end

  def each
    raise 'Please provide a block!' unless block_given?
    people.each do |person|
      yield person
    end
  end

end

people = People.new([p1,p2,p3])

# 由于引入了Enumerable模块并且定义了each方法所以可以使用所有Enumerable里的方法
people.each do |p|
  puts p.name
end

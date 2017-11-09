module Helper
  def self.distance(obj1, obj2)
    # **是平方
    Math.sqrt((obj1.x - obj2.x)**2 + (obj1.y - obj2.y)**2)

  end

  def shift_right(x = 0)
    x-3
  end

  # mixin - mix method into class
  # 使用的时候只需要在class中include即可
  # class Point
  #   include Helper
  # end
  # 这样实例就可以调用shift_right方法
  # p = Point.new()
  # p.shift_right()

  # 使用extend可以将shift_right方法作为Point的class方法
  # class Point
  #   extend Helper
  # end
  # Point.shift_right()

end

# 使用以下方法可以将所有想mixin的class方法放入MininClassMethods里，最后使用self.included这个hook使所有的方法都成为class方法
module Helper2
  def shift_right(x = 0)
    x-3
  end

  module MininClassMethods
    def distance(obj1, obj2)
      Math.sqrt((obj1.x - obj2.x)**2 + (obj1.y - obj2.y)**2)
    end

    # def other_method_name
    #   ...
    # end

    def self.included(klass)
      klass.extend MininClassMethods
    end
  end
end
# 这样MininClassMethods里所有的方法都成为Point的class方法，而其他方法会作为instance方法
class Point
  include Helper2
end

Point.include?(Helper2) #true

Point.is_a? Module #true
# 说明所有的class都是Module，区别在于class可以实例化对象，而module不可以

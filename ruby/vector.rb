class Vector
  attr_reader :x, :y

  def initialize(x, y)
    @x = x
    @y = y
  end

  # 可以将符号作为方法名，即自定义运算符
  # 向量加减运算规则：x坐标和y坐标分别相加减
  def +(vector)
    Vector.new(@x+vector.x, @y+vector.y)
  end
  def -(vector)
    Vector.new(@x-vector.x, @y-vector.y)
  end
end

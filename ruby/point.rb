class Point
  attr_accessor :x, :y

  def initialize(x=0,y=0)
    @x = x
    @y = y
  end

  def +(point)
    newPoint = Point.new(x+point.x, y+point.y)
  end

  def -(point)
    newPoint = Point.new(x-point.x, y-point.y)
  end
end

class Point3D < Point
  def initialize(x=0,y=0,z=0)
    super(x,y)
    @z = z
  end

end


p = Point3D.new(1,2,3)

# is_a?方法只要对象属于类或者类的父类就返回true
p.is_a? Point #true
p.is_a? Point3D #true

p.instance_of? Point #false
p.instance_of? Point3D #true

class Human
	# 常量首字母大写，调用时使用Human::Version
	Version = "0.1"

	# attr_accessor可读写
	attr_accessor :name
	# attr_reader只读，attr_writer只写
	attr_reader :id
	attr_writer :gender

	def initialize(name, id, gender)
		@name = name
		@id = id
		@gender = gender
	end

	def sayHi
		puts "My name is #{@name}, Id is #{@id}."
	end

	# 方法默认是public，可以用private关键字将方法定义为private
	private
	def selfDestruct
		puts "I am dying..."
	end

	# 类方法
	def self.max_age
		return 200
	end

end

class Student < Human
	def study
		puts "Studying"
	end
end

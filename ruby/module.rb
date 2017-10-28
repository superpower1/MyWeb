module MyModule

	MyConst = 2.14

	def self.myFunc(input)
		return input
	end

	def sayHi
		p "Hi"
	end
end

module Module1
	A = 1
	def greeting
		p "hi"
	end
end

module Module2
	B = 1
	def self.hello
		p "hello"
	end
end

# 不能直接调用模块中的sayHi方法，但是可以通过在class中include这个模块从而调用sayHi方法
class MyClass
	include MyModule
	extend Module1
	extend Module2
end

a = MyClass.new
# Module2的hello方法是不可能被调用的
# a.hello会报错
# 用include混入的方法是对象方法，而extend混入的方法是类方法，所以Module1的greeting不能通过a.greeting调用，只能通过MyClass.greeting调用
MyClass.greeting

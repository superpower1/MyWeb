# 在runtime生成方法
eval "def foo; puts 'foo'; end"

String.instance_eval "def foo; puts 'instance_eval foo'; end"
String.foo # 输出instance_eval foo


String.class_eval "def foo; puts 'class_eval foo'; end"
str = 'sth'
str.foo # 输出class_eval foo

define_method(:foo) { |arg|
  puts arg
}  

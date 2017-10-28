input = gets.to_i

if input == 1
	puts "true"
else 
	puts "false"
end

case input
	#1..2表示大于等于1或小于等于2
when 1..2
	puts "1,2"
	#3...7表示大于等于3小于7
when 3...7
	puts "3,4,5,6"
end
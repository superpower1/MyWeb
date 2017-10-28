input = gets.chomp.to_i 

while input>0
	
	input -= 1
	puts input

	break if input == 2
	next if input == 1

end
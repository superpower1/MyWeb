while true
	b = gets.to_i
	a = 100
	begin
		puts a/b
	rescue Exception => e
		puts e
	end
end

arr = [1,2,3]

def arr.singleton
  self.map! { |ele|
    ele * 2
  }
end

def arr.*(num)
  self.each_with_index do | val, i |
    self[i] = val*num
  end
end

puts arr
arr.singleton
puts arr
arr*3
puts arr

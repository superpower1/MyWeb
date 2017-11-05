def each_starts_with(arr, str)
  arr.each do |value|
    if value.start_with?(str)
      yield value
    end
  end

end

each_starts_with(['abcs','adgf','abth'], 'ab') { |a| puts a }

class Book
  attr_accessor :title, :author

  def initialize(title, author)
    @title = title
    @author = author
  end
end

class BookList
  def initialize(bl)
    @book_list = bl ? bl : Array.new
  end

  def length
    @book_list.length
  end

  def add_book(book)
    @book_list.push(book)
  end

  def [](n)
    @book_list[n]
  end

  def each_title
    @book_list.each{ |book|
      yield(book.title)
    }
  end
end

bl1 = BookList.new(nil)
bl1.add_book(Book.new("haha", "go"))
p bl1.length
p bl1[0]

bl2 = BookList.new([Book.new("a", "b"), Book.new("c", "d")])
bl2.each_title{ |title|
  p title
}

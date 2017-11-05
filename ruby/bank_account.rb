class BankAccount

  attr_reader :balance

  @@exchange_rate = 5

  def initialize(amount = 0)
    @balance = amount
  end

  class << self
    def aud_to_rmb(amount)
      (amount*@@exchange_rate).round(2)
    end
    def rmb_to_aud(amount)
      (amount/@@exchange_rate).round(2)
    end
  end

  def deposite(amount)
    balance += amount
  end

  def withdraw(amount)
    raise 'Overdraw!' if amount>@balance
    balance -= amount
  end
end

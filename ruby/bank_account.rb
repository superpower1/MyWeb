class BankAccount

  include Lib

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
    @balance += amount
  end

  def withdraw(amount)
    raise 'Overdraw!' if amount>@balance
    @balance -= amount
  end
end

class CommBankAccount < BankAccount
  def transfer(to_account, amount)
    @balance -= amount
    to_account.deposite(amount)
  end

  def withdraw(amount)
    super
    @balance -= 3
  end
end

class ANZBankAccount < BankAccount

  def withdraw(amount)
    super
    @balance -= 2
  end
end

module Lib
  BUCKETS = [0, 1000, 10_000, 50_000]
  def annual_fee
    case balance
    when BUCKETS[0]...BUCKETS[1]
      10
    when BUCKETS[1]...BUCKETS[2]
      5
    when BUCKETS[2]...BUCKETS[3]
      3
    else
      0
    end
  end
end

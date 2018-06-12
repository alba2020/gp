import unittest
from selenium import webdriver
from selenium.webdriver.common.keys import Keys

#наследуемся от TestCase
class FirstTest(unittest.TestCase):
  
  #выполняется перед каждым тестом
  def setUp(self):
    self.driver = webdriver.Chrome()
  
  #тест - начинается с test_
  def test_first_test(self):
    self.driver.get("http://python.org")
    assert "Python" in self.driver.title

  def test_simple(self):
    assert True

  # после каждого теста
  def tearDown(self):
    self.driver.close()

# точка входа
if __name__ == "__main__":
    unittest.main()
  
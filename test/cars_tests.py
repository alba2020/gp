import unittest
from driver import Driver
from cars_list_page import CarsListPage

# это мои тесты, они используют мой фреймворк
class CarsTest(unittest.TestCase):
  
  # один раз
  @classmethod
  def setUpClass(cls):
    super(CarsTest, cls).setUpClass()
    Driver.initialize()
      
  # # перед каждым тестом
  # def setUp(self):
  #   # self.driver = Driver.get_instance()
  #   pass
  
  def test_header_of_car_list(self):
    """Header must contain the string 'List of cars'"""
    CarsListPage.go_to()
    assert CarsListPage.is_at()
    # driver = Driver.get_instance()
    # driver.get("http://localhost/gp/cars.php")
    
    # main_header = driver.find_element_by_id("main_header")
    # assert "List of cars" in main_header.text

  # def tearDown(self):
    # self.driver.close()

  @classmethod
  def tearDownClass(cls):
    Driver.close()

if __name__ == "__main__":
    unittest.main()
  
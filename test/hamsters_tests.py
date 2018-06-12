import unittest
from driver import Driver
from all_hamsters_page import AllHamstersPage
from hamster_details_page import HamsterDetailsPage

# это мои тесты, они используют мой фреймворк
class HamsterTest(unittest.TestCase):
  
  # один раз
  @classmethod
  def setUpClass(cls):
    super(HamsterTest, cls).setUpClass()
    Driver.initialize()
      
  # # перед каждым тестом
  # def setUp(self):
  #   # self.driver = Driver.get_instance()
  #   pass
  
  def test_header_hamster_details(self):
    """Header must contain the string 'Hamster details'"""
    HamsterDetailsPage.go_to(1)
    assert HamsterDetailsPage.is_at(1)

  def test_must_not_be_another_hamster(self):
    """test"""
    HamsterDetailsPage.go_to(1)
    assert not HamsterDetailsPage.is_at(2)

  def test_header_of_all_hamsters(self):
    """Header must contain the string 'All hamsters'"""
    AllHamstersPage.go_to()
    assert AllHamstersPage.is_at()
    # driver = Driver.get_instance()
    # driver.get("http://localhost/gp/cars.php")
    
    # main_header = driver.find_element_by_id("main_header")
    # assert "List of cars" in main_header.text

  # def tearDown(self):
    # self.driver.close()

  def test_5_hamsters_on_page(self):
    """There are must be 5 hamsters on page"""
    AllHamstersPage.go_to()
    assert AllHamstersPage.get_n_hamsters() == 5, "hamsters: %d" % AllHamstersPage.get_n_hamsters()

  @classmethod
  def tearDownClass(cls):
    Driver.close()

if __name__ == "__main__":
    unittest.main()
  
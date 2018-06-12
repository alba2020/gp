import unittest
from selenium import webdriver

class HamstersTest(unittest.TestCase):
  
  def setUp(self):
    self.driver = webdriver.Chrome()
  
  def test_header_of_hamster(self):
    """Header must contain the string 'All hamsters'"""
    self.driver.get("http://localhost/gp/hamster.php")
    main_header = self.driver.find_element_by_id("main_header")
    assert "All hamsters" in main_header.text

  def test_second_header_of_hamsters(self):
    """Second header must contain the string 'List of all hamsters'"""
    self.driver.get("http://localhost/gp/hamster.php")
    headers = self.driver.find_elements_by_tag_name('h1')
    second_header = headers[1]
    # for h in headers:
    #   print (h.text)
    assert "List of all hamsters" in second_header.text

  def test_first_link(self):
    """First link should lead to details page"""
    self.driver.get("http://localhost/gp/hamster.php")
    first_link = self.driver.find_element_by_tag_name('a')
    first_link.click()
    details_header = self.driver.find_element_by_tag_name('h1')
    assert "Hamster details" in details_header.text

  def test_back_link(self):
    """Back link should to All hamsters page"""
    self.driver.get("http://localhost/gp/hamster.php?id=1")
    back_link = self.driver.find_element_by_link_text('back')
    back_link.click()
    all_hamsters_header = self.driver.find_element_by_id("main_header")
    assert "All hamsters" in all_hamsters_header.text


  def tearDown(self):
    self.driver.close()

if __name__ == "__main__":
    unittest.main()
  
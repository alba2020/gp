from driver import Driver

#часть моего фреймворка автоматизации тестирования
class CarsListPage:
  
  @staticmethod
  def go_to():
    driver = Driver.get_instance()
    driver.get("http://localhost/gp/cars.php")

  @staticmethod
  def is_at():
    driver = Driver.get_instance()
    main_header = driver.find_element_by_id("main_header")
    return "List of cars" in main_header.text

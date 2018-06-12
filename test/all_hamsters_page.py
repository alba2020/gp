from driver import Driver

#часть моего фреймворка автоматизации тестирования
class AllHamstersPage:
  
  @staticmethod
  def go_to():
    driver = Driver.get_instance()
    driver.get("http://localhost/gp/hamster.php")

  @staticmethod
  def is_at():
    driver = Driver.get_instance()
    main_header = driver.find_element_by_id("main_header")
    return "All hamsters" in main_header.text

  @staticmethod
  def get_n_hamsters():
    driver = Driver.get_instance()
    trs = driver.find_elements_by_tag_name("tr")
    return (len(trs) - 2)

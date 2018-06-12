from driver import Driver

#часть моего фреймворка автоматизации тестирования
class HamsterDetailsPage:
  
  @staticmethod
  def go_to(id):
    driver = Driver.get_instance()
    driver.get("http://localhost/gp/hamster.php?id=" + str(id))

  @staticmethod
  def is_at(id):
    driver = Driver.get_instance()
    main_header = driver.find_element_by_tag_name('h1')
    hamster_id = int(driver.find_element_by_tag_name('h3').text.split("id: ")[1])
    return ("Hamster details" in main_header.text) and (id == hamster_id)


# page.goto(5)
# assert page.is_at(5)

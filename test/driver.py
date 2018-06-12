from selenium import webdriver

class Driver:

  @classmethod
  def initialize(cls):
    cls.instance = webdriver.Chrome()

  @classmethod
  def get_instance(cls):
    return cls.instance

  @classmethod
  def close(cls):
    cls.instance.close()

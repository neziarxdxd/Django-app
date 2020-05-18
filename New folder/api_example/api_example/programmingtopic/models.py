from django.db import models

class ProgrammingTopics(models.Model): 
    topic_name = models.CharField(max_length=50)
    symbols = models.CharField(max_length=50)

    def __str__(self):
        return self.topic_name


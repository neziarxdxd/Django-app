from rest_framework import serializers
from .models import ProgrammingTopics

class LanguageSerializer(serializers.HyperlinkedModelSerializer):
    class Meta:
        model = ProgrammingTopics
        fields = ('id', 'url', 'topic name', 'symbols')
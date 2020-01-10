from django.shortcuts import render
from django.http import HttpResponse
from .models import Event
# Create your views here.
def index (request):

    e = Event.objects.all()
    context = {
        'title': 'This is my ',
        'data': e
    }
    
    return render(request, 'posts/index.html',context)

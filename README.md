# MY FIRST APP

The clean, fast and right way to start a new Django `2.2.2` powered website.

## Getting Started

Setup project environment with [virtualenv](https://virtualenv.pypa.io) and [pip](https://pip.pypa.io).

```
bash
$ virtualenv project-env
$ source project-env/bin/activate
$ pip install -r https://raw.githubusercontent.com/juanifioren/django-project-template/master/requirements.txt

# You may want to change the name 'myapp`
$ django-admin startproject --template https://github.com/raizengxd/OTHER-EXCESS/new/master.zip myapp

$ cd myapp/
$ cp settings_custom.py.edit settings_custom.py
$ python manage.py migrate
$ python manage.py runserver
```

## Features

* Basic Django scaffolding (commands, templatetags, statics, media files, etc).
* Split settings in two files. `settings_custom.py` for specific environment settings (localhost, production, etc). `myapp/settings.py` for core settings.
* Simple logging setup ready for production envs.
* Nice
## Contributing

I love contributions, so please feel free to fix bugs, improve things, provide documentation. Just send a pull request.

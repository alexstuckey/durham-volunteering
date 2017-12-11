# Durham Volunteering

## Structure
The app is built on Codeigniter PHP MVC.

There is a Gulp / npm-based asset pipeline, which takes assets from the `/app/src` directory and builds them into `app/static`. This is ignored in the repository, since it should be built each time. It sources assets from npm modules, e.g. bootstrap, jQuery.


## 📦 Getting started
1. Install with npm

```shell
cd app
npm i
```

2. Build the static assets

```shell
gulp
```
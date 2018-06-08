<h1 align="center">
  <br>
  <img alt="Durham Volunteering Programme" title="Durham Volunteering Programme" src="../master/app/src/images/volunteering-programme-logo.svg">
  <br>
  Durham Volunteering
  <br>
</h1>

<h3 align="center">An app to request and log volunteering hours</h3>
<h5 align="center">Staff metrics, user engement, and chairty relationships</h5>

<p align="center">
  <a href="#key-features">Key Features</a> •
  <a href="https://github.com/alexstuckey/durham-volunteering/files/2086204/team_8_userguide.pdf">User Guide</a> •
  <a href="#structure">Structure</a> •
  <a href="#-getting-started">Getting Started</a>
</p>

## Key Features

* **Activity mangement**
  * Create causes
  * View list of volunteering activities
  * View detail of volunteer time
  * Create new time request
  * Approve time request
* **Interactivity**
  * Event notifications
  * Email notifications
  * Access from desktop web
  * Access from mobile web
* **History**
  * Statistics
  * Audit trail



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

3. Access a page using something like:

http://127.0.0.1/durham-volunteering/app/index.php/Causes/list

# Twenty Sixteen React

This is the Twenty Sixteen theme rebuilt using [ReactifyWP](https://github.com/10up/reactifywp/)

<p align="center">
<a href="http://10up.com/contact/"><img src="https://10updotcom-wpengine.s3.amazonaws.com/uploads/2016/10/10up-Github-Banner.png" width="850"></a>
</p>

## Background

Isomorphic web applications (running the same code on the server and client) are all the rage because they provide the flexibility, extensibility, and consistency needed to build large and powerful "app-like" experiences on the web. JavaScript and Node.js are used to create isomorphic applications since JS runs natively in the web browser.

As 8 million different isomorphic web frameworks and strategies have popped up around JavaScript, we, in the WordPress community, have been stuck in PHP world where the same isomorphism isn't really possible. We believe WordPress is an incredibly relevant and useful fully-fledged CMS with the best overall editorial experience available for publishing content. Therefore, we don't want to abandon WordPress for the newest "hot" web technology.

To create JavaScript powered "app-like" experiences in WordPress, we currently have a few options:

1. Create a PHP theme with a client side layer that refreshes the DOM using something like Underscore templates and the [REST API](http://v2.wp-api.org/). This strategy allows us to achieve the desired effect but is a bit forced in that we have to create templates in PHP and separate ones for JavaScript. This structure is tough to maintain from a development perspective.

2. With the release of the REST API, we can discard WordPress's front-end completely. We can use Node.js and something like Express to serve our front-end communicating with WordPress using the REST API. This is great but presents some serious difficulties. For one, we have to make an external request to get simple things like theme options, menus, and sidebars. Customizer functionality is essentially useless. Previews and comments are very hard to implement. The admin bar is gone. Front-end authentication becomes an extremely hard problem to solve. Plugins can't interact with the front-end.

3. Some hybrid of the first two options.

The options currently available lead us to build [ReactifyWP](https://github.com/10up/reactifywp/).

*ReactifyWP uses PHP to execute Node.js code on the server.* This is made possible by [V8Js](https://github.com/phpv8/v8js) which is a PHP extension for [Google's V8 engine](https://developers.google.com/v8/). ReactifyWP exposes WordPress hooks, nav menus, sidebars, posts, and more within server-side Javascript. A simple API for registering PHP "tags" within JavaScript is made available. It also includes a REST API for retrieving route information, updated tags, sidebars, menus, etc. as the state of your application changes. With ReactifyWP, we can serve a __true isomorphic application__ from within PHP. We get all the benefits of WordPress and all the benefits of powerful isomorphic Node.js technologies. No separate Node.js/Express server is necessary.

Twenty Sixteen React is a standard WordPress theme rebuilt using the following technologies:
* [Node.js](https://nodejs.org/)
* [React.js](https://facebook.github.io/react/)
* [Redux](http://redux.js.org/docs/introduction/)
* [ReactifyWP](https://github.com/tlovett1/reactifywp/)

The theme uses all of the popular new Node.js technologies giving you the holy grail of "app-like" experiences with your favorite CMS.

## Install

1. First, install V8Js and PHP 5.6+. This repository contains the Twenty Theme React theme within the `/wordpress/wp-content/themes` directory. The rest of the repository is for environment set up. If you just want the theme, you can pull it out. If you want to run the theme within the Docker Compose based development environment, run `docker-compose up` within the project root.
2. Install Twenty Sixteen React just as you would a standard WordPress theme. There is no difference!
3. From within the theme folder, run `composer install` to install theme PHP dependencies.
4. From within the theme folder, run `npm install` then `webpack` to setup and package the JS application. You can install `webpack` globally like so `npm install -g webpack`.

## Testing and Development

The project contains a fully-fledged Docker based environment. In order to run the environment you will need [Docker](https://www.docker.com/) and [Docker Compose](https://docs.docker.com/compose/). To setup the following, run the following command in the project root:

`docker-compose up`

This command will build the environment and spin up a Docker container with MySQl and one with PHP7, V8, and v8js. After the environment finishes initializing, navigate to `localhost:8080` in your browser. Don't forget to run `composer install`, `npm install`, and `webpack` within the theme.

## Contributing

We are excited to see how the community receives the project. We'd love to receive links to open-sourced themes using ReactifyWP.

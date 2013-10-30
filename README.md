WP Stylus by Se7enSky
=========

Wordpress plugin adding Stylus support.
Rendering is done using free Se7enSky SAAS Render service using standart fresh Node.js Stylus.

# Installation

1. Install as usual Wordpress plugin.
2. Chmod 777 for cache directory under installed plugin directory

## Features

 - renders Stylus files (*.styl) to CSS files
 - hosts them as CSS files (http://host.com/wp-content/themes/se7ensky/somefile.css is actually mapped to http://host.com/wp-content/themes/se7ensky/somefile.styl)
 - basic caching implemented – re-render *.css file when *.styl file changed
 - stylus @import support

### Authors

  - [Se7enSky studio](http://www.se7ensky.com/)
  - [Ivan Kravchenko](http://github.com/krava)

#### License

(The MIT License)

Copyright (c) 2008-2013 Se7enSky studio &lt;info@se7ensky.com&gt;

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
'Software'), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

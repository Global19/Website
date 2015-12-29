<div class="magick-header">
<p class="text-center"><a href="#documentation">Documentation</a> • <a href="#get">Obtaining Magick++</a> • <a href="#install">Installation</a> • <a href="#bugs">Reporting Bugs</a></p>

<a id="intro"></a>
<p class="lead magick-description"><a href="<?php echo $_SESSION['RelativePath']?>/../api/Magick++/index.html">Magick++ API</a> is the object-oriented C++ API to the <a href="http://www.imagemagick.org/">ImageMagick</a> image-processing library.</p>
<p>Magick++ supports an object model which is inspired by <a href="http://www.imagemagick.org/script/perl-magick.php">PerlMagick</a>.
Images support implicit reference counting so that copy constructors
and assignment incur almost no cost. The cost of actually copying an
image (if necessary) is done just before modification and this copy
is managed automagically by Magick++. De-referenced copies are
automagically deleted. The image objects support value (rather than
pointer) semantics so it is trivial to support multiple generations
of an image in memory at one time. 
</p>
<p>Magick++ provides integrated support for the <a href="http://www.sgi.com/tech/stl/">Standard
Template Library</a> (STL) so that the powerful containers available
(e.g. <a href="http://www.sgi.com/tech/stl/Deque.html">deque</a>,
<a href="http://www.sgi.com/tech/stl/Vector.html">vector</a>, <a href="http://www.sgi.com/tech/stl/List.html">list</a>,
and <a href="http://www.sgi.com/tech/stl/Map.html">map</a>)  can
be used to write programs similar to those possible with PERL &amp;
PerlMagick. STL-compatible template versions of ImageMagick's
list-style operations are provided so that operations may be
performed on multiple images stored in STL containers. 
</p>
<h2 class="magick-header">Documentation</h2>
<a id="documentation"></a>
<p>Detailed <a href="<?php echo $_SESSION['RelativePath']?>/../api/magick++-classes.php">documentation</a> is
provided for all Magick++ classes, class methods, and template
functions which comprise the API.  See a <a href="http://www.imagemagick.org/Magick++/tutorial/Magick++_tutorial.pdf">  Gentle Introduction to Magick++</a> for an introductory tutorial to Magick++.  We include the <a href="http://www.imagemagick.org/Magick++/tutorial/Magick++_tutorial.odt" >source</a> if you want to correct, enhance, or expand the tutorial.</p>
<h2 class="magick-header">Obtaining Magick++</h2>
<a id="get"></a>
<p>Magick++ is included as part of <a href="../index.php">ImageMagick</a>
source releases and may be retrieved via <a href="http://www.imagemagick.org/script/download.php">ftp</a>
or <a href="http://git.imagemagick.org/repos/ImageMagick/Magick++">GIT</a>.
</p>
<h2 class="magick-header">Installation</h2>
<a id="install"></a>
<p>Once you have the Magick++ sources available, follow these detailed
<a href="<?php echo $_SESSION['RelativePath']?>/../Magick++/Install.html">installation instructions</a> for UNIX and
Windows. 
</p>
<h2 class="magick-header">Usage</h2>
<p>A helper script named <code>Magick++-config</code> is installed
under Unix which assists with recalling compilation options required
to compile and link programs which use Magick++. For example, the
following command compiles and links the source file <code>demo.cpp</code>
to produce the executable <code>demo</code> (notice that quotes are
backward quotes): 
</p>
<pre>
c++ `Magick++-config --cxxflags --cppflags` -O2 -o demo demo.cpp \
  `Magick++-config --ldflags --libs`
</pre>
<p>Set the <code>PKG_CONFIG_PATH</code> environment variable if ImageMagick is not in your default system path:</p>

<pre>
export PKG_CONFIG_PATH=/usr/local/lib/pkgconfig
</pre>

<p>Windows users may get started by manually editing a project file
for one of the Magick++ demo programs. 
</p>
<p>Note, under Windows (and possibly the Mac) it may be necessary to initialize the ImageMagick library prior to using the Magick++ library. This initialization is performed by passing the path to the ImageMagick DLLs (assumed to be in the same directory as your program) to the InitializeMagick() function call. This is commonly performed by providing the path to your program (argv[0]) as shown in the following example: </p>
<pre>
int main( int argc, char ** argv) {
  InitializeMagick(*argv);
  ...
</pre>
<p>This initialization step is not required under Unix, Linux,
Cygwin, or any other operating environment that supports the notion
of <var>installing</var> ImageMagick in a known location.  </p>
<p>Here is a example program that utilizes the Magick++ API to get you started, <a href="<?php echo $_SESSION['RelativePath']?>/../source/magick++.cpp">magick++.cpp</a>. It reads an image, crops it, and writes it to disk in the PNG image format.</p>

<pre class="pre-scrollable">
#include &lt;Magick++.h> 
#include &lt;iostream> 

using namespace std; 
using namespace Magick; 

int main(int argc,char **argv) 
{ 
  InitializeMagick(*argv);

  // Construct the image object. Seperating image construction from the 
  // the read operation ensures that a failure to read the image file 
  // doesn't render the image object useless. 
  Image image;
  try { 
    // Read a file into image object 
    image.read( "logo:" );

    // Crop the image to specified size (width, height, xOffset, yOffset)
    image.crop( Geometry(100,100, 100, 100) );

    // Write the image to a file 
    image.write( "logo.png" ); 
  } 
  catch( Exception &amp;error_ ) 
    { 
      cout &lt;&lt; "Caught exception: " &lt;&lt; error_.what() &lt;&lt; endl; 
      return 1; 
    } 
  return 0; 
}
</pre>
<h2 class="magick-header">Reporting Bugs</h2>
<a id="bugs"></a>
<p>Questions regarding usage should be directed to or to report any bugs go to
<a href="http://www.imagemagick.org/discourse-server/viewforum.php?f=23">Magick++ bug tracking forum</a>.
</p>
</div>
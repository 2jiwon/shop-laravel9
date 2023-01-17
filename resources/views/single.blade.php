@include('layouts.head')
      
<div>

<div class="container">
  <div class="relative flex bg-primary">
  <div class="ml-auto h-56 w-3/4 bg-primary"></div>
  <div class="absolute top-0 left-0 h-56 w-full lg:h-68">
    <div class="py-20 px-6 sm:px-12 lg:px-20">
      <h1 class="font-butler text-2xl text-white sm:text-3xl md:text-4.5xl lg:text-5xl">
        Single Page
      </h1>
      <div class="flex pt-2">
        <a href="/"
          class="font-hk text-base text-white transition-colors hover:text-primary">Home</a>
        <span class="px-2 font-hk text-base text-white">.</span>
        <span class="font-hk text-base text-white">Single Page</span>
      </div>
    </div>
  </div>
</div>

  <div class="prose prose-sm mx-auto w-11/12 py-16 text-left sm:prose sm:max-w-none md:py-20 lg:mx-0 lg:py-24 lg:pl-10 xl:w-5/6">
    <h1>
      This is the primary heading and there should only be one of
      <strong>these</strong> per page
    </h1>
    <p>
      A small <a href="">paragraph</a> to <em>emphasis</em> and show
      <strong>important</strong> bits.
    </p>
    <ul>
      <li>This is a list item</li>
      <li>So is this - there could be more</li>
      <li>
        Make sure to style list items to:
        <ul>
          <li>Not forgetting child list items</li>
          <li>Not forgetting child list items</li>
          <li>
            Not forgetting child list items
            <ul>
              <li>Not forgetting child list items</li>
              <li>Not forgetting child list items</li>
              <li>Not forgetting child list items</li>
              <li>Not forgetting child list items</li>
            </ul>
          </li>
          <li>Not forgetting child list items</li>
        </ul>
      </li>
      <li>A couple more</li>
      <li>top level list items</li>
    </ul>
    <p>Don't forget <strong>Ordered lists</strong>:</p>
    <ol>
      <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
      <li>
        Aliquam tincidunt mauris eu risus.
        <ol>
          <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
          <li>
            Aliquam tincidunt mauris eu risus.
            <ol>
              <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
              <li>Aliquam tincidunt mauris eu risus.</li>
            </ol>
          </li>
        </ol>
      </li>
      <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
      <li>Aliquam tincidunt mauris eu risus.</li>
    </ol>
    <h2>
      A sub heading which is not as important as the first, but is quite
      imporant overall
    </h2>
    <p>
      Pellentesque habitant morbi tristique senectus et netus et malesuada fames
      ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget,
      tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
      Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
    </p>
    <table>
      <tbody>
        <tr>
          <th>Table Heading</th>
          <th>Table Heading</th>
        </tr>
        <tr>
          <td>table data</td>
          <td>table data</td>
        </tr>
        <tr>
          <td>table data</td>
          <td>table data</td>
        </tr>
        <tr>
          <td>table data</td>
          <td>table data</td>
        </tr>
        <tr>
          <td>table data</td>
          <td>table data</td>
        </tr>
      </tbody>
    </table>

    <h3>
      A sub heading which is not as important as the second, but should be used
      with consideration
    </h3>
    <p>
      Pellentesque habitant morbi tristique senectus et netus et malesuada fames
      ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget,
      tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
      Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
    </p>
    <blockquote>
      <p>
        Ooh - a blockquote! Lorem ipsum dolor sit amet, consectetur adipiscing
        elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget
        ligula molestie gravida. Curabitur massa. Donec eleifend, libero at
        sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit
        amet quam. Vivamus pretium ornare est.
      </p>
    </blockquote>
    <h4>
      A sub heading which is not as important as the second, but should be used
      with consideration
    </h4>
    <p>
      Pellentesque habitant morbi tristique senectus et netus et malesuada fames
      ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget,
      tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
      Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
    </p>
    <h5>
      A sub heading which is not as important as the second, but should be used
      with consideration
    </h5>
    <p>
      Pellentesque habitant morbi tristique senectus et netus et malesuada fames
      ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget,
      tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
      Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
    </p>
    <h6>
      This heading plays a relatively small bit part role, if you use it at all
    </h6>
    <p>
      Pellentesque habitant morbi tristique senectus et netus et malesuada fames
      ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget,
      tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
      Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
    </p>
  </div>
</div>


</div>
      
@include('layouts.foot')
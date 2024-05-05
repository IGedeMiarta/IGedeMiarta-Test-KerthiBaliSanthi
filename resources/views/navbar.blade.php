 <nav class="navbar navbar-expand-lg bg-body-tertiary mb-5 ">
     <div class="container-fluid">
         <div class="container" style="display: flex;">

             <a class="navbar-brand" href="{{ route('book') }}" wire:navigate>Test II</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                 aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>

             <div class="collapse navbar-collapse" id="navbarNav" style="display: flex; justify-content: end">
                 <ul class="navbar-nav">
                     <li class="nav-item">
                         <a class="nav-link @if (Route::currentRouteName() == 'book') text-primary @endif" aria-current="page"
                             href="{{ route('book') }}" wire:navigate>Book</a>
                     </li>
                     <li class="nav-item ">
                         <a class="nav-link @if (Route::currentRouteName() == 'author') text-primary @endif"
                             href="{{ route('author') }}" wire:navigate>Author</a>
                     </li>
                     <li class="nav-item ">
                         <a class="nav-link @if (Route::currentRouteName() == 'category') text-primary @endif"
                             href="{{ route('category') }}" wire:navigate>Category</a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </nav>

<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
{{--            @if( \App\Models\Setting::value('logo') )--}}
{{--            <img src="{{ \App\Models\Setting::value('logo') }}" class="logo-icon" alt="logo icon">--}}
{{--            @endif--}}
        </div>
        <div>
{{--            @if( \App\Models\Setting::value('name') )--}}
{{--            <a href="https://www.iuris-consulti.com"><h4 class="logo-text">{{ \App\Models\Setting::value('name') }}</h4></a>--}}
{{--            @endif--}}
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <router-link to="/">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </router-link>

        </li>

        <li class="menu-label">Page Sections</li>
        {{-- <li>
          <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="bx bx-grid-alt"></i>
            </div>
            <div class="menu-title">Tables</div>
          </a>
          <ul>
            <li> <a href="table-basic-table.html"><i class="bx bx-right-arrow-alt"></i>Basic Table</a>
            </li>
            <li> <a href="table-datatable.html"><i class="bx bx-right-arrow-alt"></i>Data Table</a>
            </li>
          </ul>
        </li> --}}

{{--        <li>--}}
{{--            <a href="{{route('banner.index')}}">--}}
{{--                <div class="parent-icon"><i class="bx bx-images"></i>--}}
{{--                </div>--}}
{{--                <div class="menu-title">Banner Management</div>--}}
{{--            </a>--}}
{{--        </li>--}}

        <li>
            <router-link to="/manage-about">
                <div class="parent-icon"><i class="bx bx-paragraph"></i>
                </div>
                <div class="menu-title">About Page</div>
            </router-link>
        </li>

{{--        <li>--}}
{{--            <a href="{{route('category.index')}}">--}}
{{--                <div class="parent-icon"><i class="bx bx-category"></i>--}}
{{--                </div>--}}
{{--                <div class="menu-title">Library Category</div>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="{{route('product.index')}}">--}}
{{--                <div class="parent-icon"><i class="bx bx-file"></i>--}}
{{--                </div>--}}
{{--                <div class="menu-title">Resource Management</div>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="{{route('dictionary.index')}}">--}}
{{--                <div class="parent-icon"><i class="bx bx-book-reader"></i>--}}
{{--                </div>--}}
{{--                <div class="menu-title">Law Dictionary</div>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="{{route('case_summary.index')}}">--}}
{{--                <div class="parent-icon"><i class="fadeIn animated bx bx-shekel"></i>--}}
{{--                </div>--}}
{{--                <div class="menu-title">Case Summary</div>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="{{route('brand.index')}}">--}}
{{--                <div class="parent-icon"><i class="bx bx-link"></i>--}}
{{--                </div>--}}
{{--                <div class="menu-title">Home Page links</div>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="{{route('law.box')}}">--}}
{{--                <div class="parent-icon"><i class="bx bx-box"></i>--}}
{{--                </div>--}}
{{--                <div class="menu-title">Lawyer Box Management</div>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="{{route('team.index')}}">--}}
{{--                <div class="parent-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users text-white"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>--}}
{{--                </div>--}}
{{--                <div class="menu-title">Team Management</div>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="menu-label">Iuris Customer Support</li>--}}

{{--        <li>--}}
{{--            <a href="{{route('appointment.index')}}">--}}
{{--                <div class="parent-icon"><i class="bx bx-phone"></i>--}}
{{--                </div>--}}
{{--                <div class="menu-title">Appointment Management</div>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="{{route('consult.index')}}">--}}
{{--                <div class="parent-icon"><i class="lni lni-consulting"></i>--}}
{{--                </div>--}}
{{--                <div class="menu-title">Free Consultation</div>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="{{route('contact.index')}}">--}}
{{--                <div class="parent-icon"><i class="bx bx-message-detail"></i>--}}
{{--                </div>--}}
{{--                <div class="menu-title">Contact Messages</div>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="menu-label">Blog Section</li>--}}

{{--        <li>--}}
{{--            <a href="{{route('blog-category.index')}}">--}}
{{--                <div class="parent-icon"><i class="bx bx-sitemap"></i>--}}
{{--                </div>--}}
{{--                <div class="menu-title">Blog Category</div>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="{{route('blog-tags.index')}}">--}}
{{--                <div class="parent-icon"><i class="bx bx-purchase-tag"></i>--}}
{{--                </div>--}}
{{--                <div class="menu-title">Blog Tags</div>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="{{route('blog-post.index')}}">--}}
{{--                <div class="parent-icon"><i class="bx bx-repost"></i>--}}
{{--                </div>--}}
{{--                <div class="menu-title">Blog Post</div>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="{{route('blog-category.index')}}">--}}
{{--                <div class="parent-icon"><i class="bx bx-comment-detail"></i>--}}
{{--                </div>--}}
{{--                <div class="menu-title">Blog Comments</div>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="menu-label">News Section</li>--}}

{{--        <li>--}}
{{--            <a href="{{route('news-category.index')}}">--}}
{{--                <div class="parent-icon"><i class="bx bx-sitemap"></i>--}}
{{--                </div>--}}
{{--                <div class="menu-title">News Category</div>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="{{route('news-tags.index')}}">--}}
{{--                <div class="parent-icon"><i class="bx bx-purchase-tag"></i>--}}
{{--                </div>--}}
{{--                <div class="menu-title">News Tags</div>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="{{route('news-post.index')}}">--}}
{{--                <div class="parent-icon"><i class="bx bx-repost"></i>--}}
{{--                </div>--}}
{{--                <div class="menu-title">News Post</div>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="{{route('news-category.index')}}">--}}
{{--                <div class="parent-icon"><i class="bx bx-comment-detail"></i>--}}
{{--                </div>--}}
{{--                <div class="menu-title">News Comments</div>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="menu-label">User Management Section</li>--}}

{{--        <li>--}}
{{--            <a href="user-profile.html">--}}
{{--                <div class="parent-icon"><i class="bx bx-user-circle"></i>--}}
{{--                </div>--}}
{{--                <div class="menu-title">User Profile</div>--}}
{{--            </a>--}}
{{--        </li>--}}



        <li class="menu-label">Others</li>

        <li>
            <router-link to="/settings">
                <div class="parent-icon"><i class="bx bx-cog"></i>
                </div>
                <div class="menu-title">Settings</div>
            </router-link>
        </li>

        <li>
            <router-link to="clear">
                <div class="parent-icon"><i class="bx bx-link"></i>
                </div>
                <div class="menu-title">Website Settings</div>
            </router-link>
        </li>

    </ul>
</div>




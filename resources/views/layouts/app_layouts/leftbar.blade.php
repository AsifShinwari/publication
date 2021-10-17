            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="{{route('dashboard')}}">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            
                            @if(\Auth::user()->type=='Admin')
                            <li>
                                <a href="javascript: void(0);">
                                    <small class="fa fa-cogs"></small>
                                    <span> Settings </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route('backend.general.info')}}">App-Info</a></li>
                                    <li><a href="{{route('users')}}">Users</a></li>
                                   
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);">
                                    <small class="fa fa-bitcoin"></small>
                                    <span> Payments </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route('backend.payments.index')}}">Payments</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);">
                                    <small class="fa fa-table"></small>
                                    <span> Pages </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route('backend.home')}}">Home</a></li>
                                    <li><a href="{{route('backend.partners.index')}}">Our Partners List</a></li>
                                    <li><a href="{{route('backend.conference.index')}}">Conferences</a></li>
                                    <li><a href="{{route('backend.events')}}">Events</a></li>
                                    <li>
                                        <a href="javascript: void(0);">
                                            <span> About Us </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul class="nav-second-level" aria-expanded="false">
                                            <li><a href="{{route('backend.aboutUs.index')}}">About Us</a></li>
                                            <li><a href="{{route('backend.aboutUs.tie.up')}}">Tie Up Institution</a></li>
                                        </ul>
                                    </li>
                                   
                                    {{--<li><a href="{{route('backend.advisory.board.index')}}">Advisory Board</a></li>
                                    <li><a href="{{route('backend.projects.index')}}">Research & Development</a></li>--}}

                                    <li>
                                        <a href="javascript: void(0);">
                                            <span> Resources </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul class="nav-second-level" aria-expanded="false">
                                            <li><a href="{{route('backend.resourses.research.funding.index')}}">Research Funding</a></li>
                                            <li><a href="{{route('backend.mentors.index')}}">Entrepreneurship Development</a></li>
                                            <li><a href="{{route('backend.event.sponsership.index')}}">Event Sponsorship</a></li>
                                            <li><a href="{{route('backend.patent.index')}}">Patent</a></li>
                                            <li><a href="{{route('backend.mentor.posts.index')}}">Mentor Posts</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('backend.contact.us.index')}}">Contact</a></li>
                                    <li><a href="{{route('backend.publication.index')}}">Publications</a></li>
                                    <li><a href="{{route('backend.publication.journal.index')}}">Journals</a></li>

                                </ul>
                            </li>
                            
                            @endif
                        </ul>
                    </div>
                    
					<!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            
			<!-- Left Sidebar End -->
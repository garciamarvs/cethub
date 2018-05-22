                            <li class="dropdown">
                                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i> Manage<span class="caret"></span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a tabindex="-1" href="<?= base_url()?>announcement/manage"><i class="fa fa-bullhorn"></i> Announcements</a>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a class="test" tabindex="-1" href="#"><i class="fa fa-book"></i> Semester <span class="fa fa-caret-right pull-right" style="margin-top:5px;"></span></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                    <a tabindex="-1" href="<?= base_url()?>semester/addSemester"><i class="fa fa-plus"></i> Add Semester</a>
                                            </li>
                                            <li>
                                                    <a tabindex="-1" href="<?= base_url()?>semester/addSection"><i class="fa fa-plus"></i> Add Section</a>
                                            </li>
                                            <li>
                                                    <a tabindex="-1" href="<?= base_url()?>semester/addCourse"><i class="fa fa-plus"></i> Add Course</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a class="test" tabindex="-1" href="#"><i class="fa fa-user"></i> Users <span class="fa fa-caret-right pull-right" style="margin-top:5px;"></span></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                    <a tabindex="-1" href="<?= base_url()?>user/addUser"><i class="fa fa-plus"></i> Add User</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
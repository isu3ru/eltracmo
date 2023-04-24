<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li><a href="index" key="t-default">Home</a></li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards"></span> System
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('users.view')); ?>" key="t-default">Users</a></li>
                        <li><a href="<?php echo e(route('employees.view')); ?>" key="t-default">Employees</a></li>
                        <li><a href="<?php echo e(route('supplier.view')); ?>" key="t-default">Suppliers</a></li>
                        <li><a href="<?php echo e(route('holiday.view')); ?>" key="t-default">Holidays</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards"></span> Inventory
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('items.view')); ?>" key="t-default">Items</a></li>
                        <li><a href="<?php echo e(URL::to('goods-receivings')); ?>" key="t-default">Goods Receivings</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards"></span> Jobs
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('appointments.view')); ?>" key="t-default">Appointments</a></li>
                        <li><a href="<?php echo e(URL::to('jobs')); ?>" key="t-default">Jobs</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards"></span> Customers
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('customers.view')); ?>" key="t-default">Customers</a></li>
                        <li><a href="<?php echo e(route('vehicles.view')); ?>" key="t-default">Vehicles</a></li>
                        <li><a href="<?php echo e(URL::to('payments')); ?>" key="t-default">Payments</a></li>
                        <li><a href="<?php echo e(URL::to('complaints')); ?>" key="t-default">Complaints</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<?php /**PATH C:\projects\eltracmo\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>
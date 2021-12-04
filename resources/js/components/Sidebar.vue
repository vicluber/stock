<template>
    <nav
        id="sidebarMenu"
        class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"
    >
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <router-link class="nav-link" to="/dashboard">
                    Dashboard
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/products">
                    Products
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/products">
                    Items
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/products">
                    Caregories
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/products">
                    Brands
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/products">
                    Orders
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/products">
                    Transactions
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/products">
                    Users
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="/products">
                    Addresses
                    </router-link>
                </li>
            </ul>

            <h6
            class="
                sidebar-heading
                d-flex
                justify-content-between
                align-items-center
                px-3
                mt-4
                mb-1
                text-muted
            "
            >
                <span>Saved reports</span>
                <a class="link-secondary" href="#" aria-label="Add a new report">
                    Secondary
                </a>
            </h6>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'Sidebar'
}
</script>

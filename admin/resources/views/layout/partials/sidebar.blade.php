<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <x-layout.logo :href="route('dashboard')" />

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">




        <x-layout.sidebar.menu-item title="Dashboard" iconClass="ti-layout" :link="route('dashboard')" :active="request()->routeIs('dashboard')" />


        <x-layout.sidebar.menu-item title="Products" iconClass="ti-armchair-2" :active="request()->routeIs('products.*') || request()->routeIs('product-categories.*')" hasSubMenu>
            <x-layout.sidebar.menu-item title="Product List" :link="route('products.index')" :active="request()->routeIs('products.index')" />
            <x-layout.sidebar.menu-item title="Categories" :link="route('product-categories.index')" :active="request()->routeIs('product-categories.*')" />
        </x-layout.sidebar.menu-item>

        <x-layout.sidebar.menu-item title="Testimonials" iconClass="ti-hearts" :link="route('testimonials.index')" :active="request()->routeIs('testimonials.*')" />

        <x-layout.sidebar.menu-item title="Contact Information" iconClass="ti-address-book" :link="route('contact-info.index')"
            :active="request()->routeIs('contact-info.*')" />



    </ul>
</aside>

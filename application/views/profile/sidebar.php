<div class="leftbar p-r-20 p-r-0-sm">
    <ul class="p-b-54">
        <li class="p-t-4">
            <a href="<?php echo base_url('index.php/profile/') ?>" class="s-text13<?php echo ($this->uri->segment(2) == "")? " active1":"";  ?>">
                Profile
            </a>
        </li>
        <li class="p-t-4">
            <a href="<?php echo base_url('index.php/profile/my-orders') ?>" class="s-text13<?php echo ($this->uri->segment(2) == "my-orders")? " active1":"";  ?>">
                My Orders
            </a>

        </li>
        <li class="p-t-4">
            <a href="<?php echo base_url('index.php/profile/my-wishlist') ?>" class="s-text13<?php echo ($this->uri->segment(2) == "my-wishlist") ? " active1":"";  ?>">
                My Wishlist
            </a>

        </li>
    </ul>
</div>
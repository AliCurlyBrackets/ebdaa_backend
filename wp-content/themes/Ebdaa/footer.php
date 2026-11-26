 </main>

    <footer id="footer">
        <div class="wrap">
            <div class="fg">
                <div><img src="assets/img/logo.webp" alt="إبداع">
                    <p style="color:var(--mut);font-size:14px;margin:0">Build · Grow · Inspire</p>
                </div>
                <div>
                    <h4>روابط سريعة</h4>
                    <ul>
                        <li><a href="#home">الرئيسية</a></li>
                        <li><a href="services.html">خدماتنا</a></li>
                        <li><a href="#works">أعمالنا</a></li>
                        <li><a href="#pricing">الباقات</a></li>
                        <li><a href="blog.html">المدونة</a></li>
                    </ul>
                </div>
                <div>
                    <h4>خدماتنا</h4>
                    <ul>
                        <li>تصميم المواقع</li>
                        <li>تطوير المتاجر</li>
                        <li>حلول مخصصة</li>
                        <li>استشارات رقمية</li>
                    </ul>
                </div>
                <div>
                    <h4>تواصل معنا</h4>
                    <ul>
                        <li>✉ hello@example.com</li>
                        <li dir="ltr" style="text-align:right">☎ +20 123 456 7890</li>
                    </ul>
                    <div class="soc"><a href="#">in</a><a href="#">X</a><a href="#">▶</a><a href="#">f</a></div>
                </div>
                <div>
                    <h4>اشترك في نشرتنا البريدية</h4><small style="color:var(--mut)">ليصلك كل جديد عن عالم
                        التقنية</small>
                    <form class="nl"
                        onsubmit="event.preventDefault();this.querySelector('input').value='';this.querySelector('button').textContent='✓'">
                        <input type="email" placeholder="بريدك الإلكتروني" required><button
                            aria-label="إرسال">➤</button></form>
                </div>
            </div>
            <div class="copy"><span>© 2025 إبداع. جميع الحقوق محفوظة</span><i class="ln"></i><b>Build · Grow ·
                    Inspire</b></div>
        </div>
    </footer>

    <script src="<?php echo get_template_directory_uri(  ) . '/assets/js/posts.js' ?>"></script>
    <script src="<?php echo get_template_directory_uri(  ) . '/assets/js/home.js' ?>"></script>
    <?php wp_footer(); ?>
</body>

</html>
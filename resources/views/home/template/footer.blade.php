           <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                <strong>Copyright &copy; 2022 Najwa Arisani Fauziah.</strong>
                Designed by <a
                    href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('css') }}/bootstrap.min.js"></script>
    <script src="{{ asset('src') }}/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('src') }}/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{ asset('src') }}/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{ asset('src') }}/dist/js/app-style-switcher.js"></script>
    <script src="{{ asset('src') }}/dist/js/feather.min.js"></script>
    <script src="{{ asset('src') }}/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="{{ asset('src') }}/assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="{{ asset('src') }}/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('src') }}/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="{{ asset('src') }}/assets/extra-libs/c3/d3.min.js"></script>
    <script src="{{ asset('src') }}/assets/extra-libs/c3/c3.min.js"></script>
    <script src="{{ asset('src') }}/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="{{ asset('src') }}/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="{{ asset('src') }}/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{ asset('src') }}/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{ asset('src') }}/dist/js/pages/dashboards/dashboard1.min.js"></script>

    <!--This page plugins -->
    <script src="{{ asset('src') }}/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('src') }}/dist/js/pages/datatable/datatable-basic.init.js"></script>
    
    <!-- Card Page JS -->
    <script src="{{ asset('src') }}/assets/extra-libs/prism/prism.js"></script>

    {{-- alert sweet --}}
    <script src="{{ asset('assets') }}js/sweetalert.min.js"></script>

    @stack('script')
</body>

</html>
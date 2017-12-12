
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1"s>
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                           
                        </li>
                    </ul>
                    <p class="copyright text-muted"> </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>fiture/vendor/bootstrap/js/bootstrap.min.js"> </script>

    <!-- Contact Form JavaScript -->
    <script src="<?php echo base_url();?>fiture/js/jqBootstrapValidation.js"></script>
    <script src="<?php echo base_url();?>fiture/js/contact_me.js"></script>
    <script src="<?php echo base_url();?>fiture/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>fiture/js/dataTables.bootstrap.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="<?php echo base_url();?>fiture/js/clean-blog.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>fiture/js/summernote.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#isi').summernote();
		$('#formDaftar').submit(function () {
			if ($('#password1').val() !== $('#password2').val()) {
				alert('Password tidak sama');
				return false;
			}
		});
        $('#pengumuman').DataTable({
            lengthChange: false,
            ordering: false,
            pageLength: 3,
            searching: false,
            info: false
        });
        $('#postingan').DataTable({
            ordering: false
        });
    });
    </script>
</body>

</html>

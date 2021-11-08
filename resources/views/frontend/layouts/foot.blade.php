<div class="container-fluid mt-5 footer">
    <div class="container pt-5 pb-4" style="font-family: 'Angkor', cursive;">
        <div class="row">
            <div class="col-12 col-lg-4">
                <p>© រក្សា​សិទ្ធិ​គ្រប់​យ៉ាង​ដោយ​ Sabay ឆ្នាំ​២០១៦</p>
                <p>អាសយដ្ឋាន</p>
                <p>អគារ​លេខ ៣០៨ មហាវិថីព្រះមុន្នីវង្ស សង្កាត់បឹងរាំង ខណ្ឌដូនពេញ</p>
            </div>
            <div class="col-12 col-lg-4">
                <h4>អំពីយើង</h4>
                <p>Sabay Digital Corporation ជា​ក្រុមហ៊ុន​ព័ត៌មាន​ឌីជីថល និង​កម្សាន្ត​ឈាន​មុខ​គេ​នៅ​កម្ពុជា។ ព័ត៌មាន​បន្ថែម</p>
                <p>ផលិត​ផល​ និង​ សេវាកម្ម របស់ Sabay</p>
            </div>
            <div class="col-12 col-lg-4">
                <h4>ជួបគ្នានៅបណ្តាញសង្គម</h4>
                <p>ទំនាក់ទំនង</p>
                <p>info@sabay.com</p>
                <p>096 675 0034</p>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('asset')}}/plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

</body>
<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
@yield('js')
</html>


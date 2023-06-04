<div class="flex mb-4" x-data="picturePreview()">
    <div class="mr-3">
        <img id="preview" src="{{ isset(Auth::user()->profile_image) ? asset('storage/' . Auth::user()->profile_image) : asset('images/user_icon.png') }}" class="w-16 h-16 rounded-full object-cover border-none bg-gray-200">
    </div>
    <div class="flex items-center">
        <button
                x-on:click="document.getElementById('profile_image').click()"
                type="button"
                class="inline-flex items-center uppercase rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            SELECT A NEW PHOTO
        </button>
        <input @change="showPreview(event)" type="file" name="profile_image" id="profile_image" class="hidden">
        <script>
            function picturePreview() {
                return {
                    showPreview: (event) =>{
                        if(event.target.files.length > 0){
                            let src = URL.createObjectURL(event.target.files[0]);
                            document.getElementById('preview').src = src;
                        }
                    }
                }
            }
        </script>
    </div>
</div>

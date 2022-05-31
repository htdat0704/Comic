package com.example.datotruyen;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.database.Cursor;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.provider.MediaStore;
import android.view.View;
import android.webkit.MimeTypeMap;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.example.datotruyen.storage.SharedPrefManager;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.InputStream;

import okhttp3.MediaType;
import okhttp3.MultipartBody;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.RequestBody;
import okhttp3.Response;

public class EditImageActivity extends AppCompatActivity {

    ImageView img;
    Button btnpostsv,btnpick;
    int REQUEST_CODE_FOLDER=1;
    String path;

    final String url_editanh = "http://192.168.43.231/appandroid/upimage.php";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edit_image);

        img = findViewById(R.id.hinhanhreal);
        btnpick = findViewById(R.id.upanhchithuat);
        btnpostsv = findViewById(R.id.capnhapchith);

        final String email = SharedPrefManager.getInstance(this).getemail();

        pickImage();

        btnpostsv.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                new postFile().execute(email);
                Intent oo = new Intent(EditImageActivity.this,ProfileActivity.class);
                oo.putExtra("emaill",email);
                startActivity(oo);
            }
        });
    }
    private void pickImage(){
        btnpick.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(Intent.ACTION_PICK);
                intent.setType("image/*");
                startActivityForResult(intent,REQUEST_CODE_FOLDER);
            }
        });
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        if(requestCode == REQUEST_CODE_FOLDER && resultCode == RESULT_OK && data!=null){
            Uri uri = data.getData();
            path = getRealPathFromURI(uri);
            try {
                InputStream inputStream = getContentResolver().openInputStream(uri);
                Bitmap bitmap = BitmapFactory.decodeStream(inputStream);
                img.setImageBitmap(bitmap);
            } catch (FileNotFoundException e) {
                e.printStackTrace();
            }

        }

        super.onActivityResult(requestCode, resultCode, data);
    }
    public String getRealPathFromURI( Uri contentUri) {

        String[] proj = { MediaStore.Images.Media.DATA };
        Cursor cursor = managedQuery(contentUri,  proj, null, null, null);
        int column_index = cursor.getColumnIndexOrThrow(MediaStore.Images.Media.DATA);
        cursor.moveToFirst();
        return cursor.getString(column_index);

    }
    class postFile extends AsyncTask<String,Void,String> {
        OkHttpClient okHttpClient = new OkHttpClient.Builder()
                .retryOnConnectionFailure(true)
                .build();

        @Override
        protected String doInBackground(String... strings) {
            String Email = strings[0];
            String url_final = url_editanh +"?email="+Email;
            File file =new File(path);
            String content_type = getType(file.getPath());
            String file_path = file.getAbsolutePath();

            RequestBody file_body = RequestBody.create(MediaType.parse(content_type),file);
            RequestBody requestBody = new MultipartBody.Builder()
                    .addFormDataPart("uploaded_image",file_path.substring(file_path.lastIndexOf("/")+1),file_body)
                    .setType(MultipartBody.FORM).build();

            Request request = new Request.Builder()
                    .url(url_final)
                    .post(requestBody)
                    .build();

            try {
                Response response = okHttpClient.newCall(request).execute();
                return response.body().string();
            } catch (IOException e) {
                e.printStackTrace();
            }
            return null;
        }

        @Override
        protected void onPostExecute(String s) {
            Toast.makeText(EditImageActivity.this,s,Toast.LENGTH_SHORT).show();
            super.onPostExecute(s);
        }
    }
    private String getType(String path) {
        String extension = MimeTypeMap.getFileExtensionFromUrl(path);
        return MimeTypeMap.getSingleton().getMimeTypeFromExtension(extension);
    }

    public void homerun(View view) {
        Intent ias = new Intent(EditImageActivity.this,MainActivity.class);
        startActivity(ias);
    }
}

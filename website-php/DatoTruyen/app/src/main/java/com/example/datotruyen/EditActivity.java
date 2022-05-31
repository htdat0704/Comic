package com.example.datotruyen;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.example.datotruyen.storage.SharedPrefManager;

import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;

public class EditActivity extends AppCompatActivity {
    ImageView oke;
    EditText edtname,edtemail,edtpass;
    final String url_edit = "http://192.168.43.231/appandroid/edit_user.php";
    Button btnname,btnemail,btnpass,btnanh;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edit);

        oke = findViewById(R.id.hinhanhchithuat);
        edtemail = findViewById(R.id.editemail);
        edtname = findViewById(R.id.editname);
        edtpass = findViewById(R.id.editpasss);
        btnanh = findViewById(R.id.suaanhchithuat);
        btnemail = findViewById(R.id.capnhapemail);
        btnname = findViewById(R.id.capnhapten);
        btnpass = findViewById(R.id.capnhapmk);

        String namehint = SharedPrefManager.getInstance(this).getName();
        final String emailhint = SharedPrefManager.getInstance(this).getemail();
        String passhint = SharedPrefManager.getInstance(this).getPass();

        Glide.with(this).load(SharedPrefManager.getInstance(this).getpic()).into(oke);
        edtname.setHint(namehint);
        edtpass.setHint(passhint);
        edtemail.setHint(emailhint);
        btnanh.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent a = new Intent(EditActivity.this,EditImageActivity.class);
                startActivity(a);
            }
        });
        btnname.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String Name = edtname.getText().toString();

                new EditName().execute(emailhint,Name);
                Intent is = new Intent(EditActivity.this, ProfileActivity.class);
                is.putExtra("emaill",emailhint);
                startActivity(is);
            }
        });
        btnemail.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String Email = edtemail.getText().toString();
                new EditEmail().execute(emailhint,Email);
                SharedPrefManager.getInstance(v.getContext()).saveUser(Email);
                Intent is = new Intent(EditActivity.this, ProfileActivity.class);
                startActivity(is);
            }
        });
        btnpass.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String Pass = edtpass.getText().toString();

                new EditPass().execute(emailhint,Pass);
                Intent is = new Intent(EditActivity.this, ProfileActivity.class);
                is.putExtra("emaill",emailhint);
                startActivity(is);
            }
        });


    }

    public class EditEmail extends AsyncTask<String,Void,String>{

        @Override
        protected String doInBackground(String... strings) {
            String Email = strings[0];
            String Emaild = strings[1];


            String Final_Url= url_edit + "?user_email=" + Email +
                    "&email=" + Emaild ;
            try{
                OkHttpClient okHttpClient = new OkHttpClient();
                Request request = new Request.Builder().url(Final_Url).get().build();

                Response response = null;

                try {
                    response = okHttpClient.newCall(request).execute();
                    if(response.isSuccessful()){
                        String result = response.body().string();
                        if(result.equalsIgnoreCase("ok")){
                            ShowToast("Sửa Email thành công");
                            finish();
                        }
                    }
                }catch (Exception e)
                {
                    e.printStackTrace();
                }

            }catch (Exception e)
            {
                e.printStackTrace();
            }

            return null;
        }
    }
    public class EditName extends AsyncTask<String,Void,String>{

        @Override
        protected String doInBackground(String... strings) {
            String Email = strings[0];
            String Name = strings[1];


            String Final_Url= url_edit + "?user_email=" + Email +
                    "&name=" + Name ;
            try{
                OkHttpClient okHttpClient = new OkHttpClient();
                Request request = new Request.Builder().url(Final_Url).get().build();

                Response response = null;

                try {
                    response = okHttpClient.newCall(request).execute();
                    if(response.isSuccessful()){
                        String result = response.body().string();
                        if(result.equalsIgnoreCase("ok")){
                            ShowToast("Sửa Tên thành công");
                            finish();
                        }
                    }
                }catch (Exception e)
                {
                    e.printStackTrace();
                }

            }catch (Exception e)
            {
                e.printStackTrace();
            }

            return null;
        }
    }
    public class EditPass extends AsyncTask<String,Void,String>{

        @Override
        protected String doInBackground(String... strings) {
            String Email = strings[0];
            String Password = strings[1];


            String Final_Url= url_edit + "?user_email=" + Email +
                    "&pass=" + Password ;
            try{
                OkHttpClient okHttpClient = new OkHttpClient();
                Request request = new Request.Builder().url(Final_Url).get().build();

                Response response = null;

                try {
                    response = okHttpClient.newCall(request).execute();
                    if(response.isSuccessful()){
                        String result = response.body().string();
                        if(result.equalsIgnoreCase("ok")){
                            ShowToast("Sửa mật khẩu thành công");
                            finish();
                        }
                    }
                }catch (Exception e)
                {
                    e.printStackTrace();
                }

            }catch (Exception e)
            {
                e.printStackTrace();
            }

            return null;
        }
    }

    public void homerun(View view) {
        Intent ias = new Intent(EditActivity.this,MainActivity.class);
        startActivity(ias);
    }
    public void ShowToast(final String text){
        this.runOnUiThread(new Runnable() {
            @Override
            public void run() {
                Toast.makeText(EditActivity.this,text,Toast.LENGTH_SHORT).show();
            }
        });
    }
}

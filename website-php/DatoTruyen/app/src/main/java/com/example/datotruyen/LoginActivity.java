package com.example.datotruyen;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.example.datotruyen.Object.Userlg;
import com.example.datotruyen.storage.SharedPrefManager;

import java.util.ArrayList;

import okhttp3.FormBody;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.RequestBody;
import okhttp3.Response;

public class LoginActivity extends AppCompatActivity {

    EditText edtEmail,edtPassword;
    TextView tvRegister;
    Button btnlog;

    final String url_Login= "http://192.168.43.231/appandroid/login_user.php";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        edtEmail=findViewById(R.id.et_email);
        edtPassword=findViewById(R.id.et_password);
        tvRegister=findViewById(R.id.tv_register);
        btnlog=findViewById(R.id.btn_login);

        tvRegister.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(LoginActivity.this, RegisterActivity.class);
                startActivity(i);
            }
        });

        btnlog.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String Email = edtEmail.getText().toString();
                String Password = edtPassword.getText().toString();
                SharedPrefManager.getInstance(LoginActivity.this).saveUser(Email);



                new LoginUser().execute(Email,Password);
            }
        });


    }

    public class LoginUser extends AsyncTask<String, Void, String>{

        @Override
        protected String doInBackground(String... strings) {
            String Email = strings[0];
            String Password = strings[1];

            OkHttpClient okHttpClient= new OkHttpClient();
            RequestBody formbody = new FormBody.Builder()
                        .add("user_id",Email)
                        .add("user_password",Password)
                        .build();

            Request request = new Request.Builder()
                    .url(url_Login)
                    .post(formbody)
                    .build();

            Response response= null;
            try {
                response = okHttpClient.newCall(request).execute();
                if(response.isSuccessful()){
                    String result = response.body().string();
                    if(result.equalsIgnoreCase("login"))
                    {
                        Intent i = new Intent(LoginActivity.this,MainActivity.class);
                        startActivity(i);
                        finish();
                    }else{

                        ShowToast("Sai thông tin đăng nhập !");
                    }
                }
            }catch (Exception e)
            {
                e.printStackTrace();
            }
            return null;
        }
    }
    public void ShowToast(final String text){
        this.runOnUiThread(new Runnable() {
            @Override
            public void run() {
                Toast.makeText(LoginActivity.this,text,Toast.LENGTH_SHORT).show();
            }
        });
    }
}

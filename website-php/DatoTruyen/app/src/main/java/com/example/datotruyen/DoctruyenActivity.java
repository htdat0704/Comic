package com.example.datotruyen;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;

import com.example.datotruyen.api.Apilayanh;
import com.example.datotruyen.interfaces.Layanhve;
import com.example.datotruyen.storage.SharedPrefManager;

import org.json.JSONArray;
import org.json.JSONException;


import java.util.ArrayList;



import okhttp3.OkHttpClient;
import okhttp3.Request;

import okhttp3.Response;


public class DoctruyenActivity extends AppCompatActivity implements Layanhve {

    final String url_tien = "http://192.168.43.231/appandroid/tienanh.php";
    final String url_lui = "http://192.168.43.231/appandroid/luianh.php";
    ImageView imghinhh;
    ArrayList<String> urla;
    int sotrang,sotrangdoc;
    TextView sotrangd,sochap;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_doctruyen);

        String t = SharedPrefManager.getInstance(this).getidchap();

        sotrangd = findViewById(R.id.sotrang);
        imghinhh = findViewById(R.id.anhhh);
        sochap = findViewById(R.id.sochaps);


        new Apilayanh(this,t).execute();
        urla = new ArrayList<>();
        urla.add("a");
        String soooo = SharedPrefManager.getInstance(this).getsochap();
        sochap.setText("Chap "+soooo);

    }

    public void left(View view) {
        doctheotrang(-1);
    }

    public void right(View view) {
        doctheotrang(1);
    }

    private void  doctheotrang (int i)
    {
        sotrangdoc = sotrangdoc + i;
        if(sotrangdoc==0)
        {
            sotrangdoc=1;
        }
        if(sotrangdoc>sotrang)
        {
            sotrangdoc=sotrang;
        }
        sotrangd.setText(sotrangdoc+" / "+sotrang);
        Glide.with(this).load(urla.get(sotrangdoc-1)).into(imghinhh);

    }

    @Override
    public void batdau() {
            Toast.makeText(this,"Loading",Toast.LENGTH_SHORT).show();
    }

    @Override
    public void ketthuc(String data) {
        try {
            urla.clear();
            JSONArray arr= new JSONArray(data);
            for(int i =0 ; i< arr.length();i++)
            {
                urla.add(arr.getString(i));
            }
            sotrangdoc = 1;
            sotrang = urla.size();
            doctheotrang(0);
        }catch (JSONException e)
        {

        }


    }

    @Override
    public void biLoi() {
        Toast.makeText(this,"Error",Toast.LENGTH_SHORT).show();
    }

    public class nextChap extends AsyncTask<String,Void,String>{

        @Override
        protected String doInBackground(String... strings) {
            String tienchap = strings[1];
            String idchap = strings[0];
            String idtruyen = strings[2];

            String Final_Url= url_tien + "?idchap=" + idchap +
                    "&tienchap=" + tienchap + "&idtruyen=" + idtruyen ;

            OkHttpClient okHttpClient = new OkHttpClient();


            Request request = new Request.Builder()
                    .url(Final_Url).get()
                    .build();

            try {
                Response response = okHttpClient.newCall(request).execute();
                if(response.isSuccessful()){
                    String result = response.body().string();
                    String[] parts = result.split("-");
                    String part1 = parts[0];
                    String part2 = parts[1];
                    SharedPrefManager.getInstance(DoctruyenActivity.this).saveidchap(part2);
                    SharedPrefManager.getInstance(DoctruyenActivity.this).savesochap(part1);
                }
            }catch (Exception e)
            {
                e.printStackTrace();
            }



            return null;
        }
    }
    public class preChap extends AsyncTask<String,Void,String>{

        @Override
        protected String doInBackground(String... strings) {
            String lui = strings[1];
            String idchap = strings[0];
            String idtruyen = strings[2];

            String Final_Url= url_lui + "?idchap=" + idchap +
                    "&lui=" + lui + "&idtruyen=" + idtruyen ;

            OkHttpClient okHttpClient = new OkHttpClient();

            Request request = new Request.Builder()
                    .url(Final_Url).get()
                    .build();


            try {
                Response response = okHttpClient.newCall(request).execute();
                if(response.isSuccessful()){
                    String result = response.body().string();
                    String[] parts = result.split("-");
                    String part1 = parts[0];
                    String part2 = parts[1];
                    SharedPrefManager.getInstance(DoctruyenActivity.this).saveidchap(part2);
                    SharedPrefManager.getInstance(DoctruyenActivity.this).savesochap(part1);
                }
            }catch (Exception e)
            {
                e.printStackTrace();
            }



            return null;
        }
    }


     public void backknss(View view) {
         Intent intent = new Intent(DoctruyenActivity.this, ChapterActivity.class);
         startActivity(intent);
     }

     public void luichap(View view) {
         String tienchap = SharedPrefManager.getInstance(view.getContext()).getsochap();
         String idchap = SharedPrefManager.getInstance(view.getContext()).getidchap();
         String idtruyen = SharedPrefManager.getInstance(view.getContext()).getIdtruyen();
         new preChap().execute(idchap,tienchap,idtruyen);
         String trep = SharedPrefManager.getInstance(view.getContext()).getidchap();
         String te = SharedPrefManager.getInstance(view.getContext()).getsochap();
         sochap.setText("Chap "+ te);
         new Apilayanh(this,trep).execute();
     }

     public void tienchap(View view) {

        String tienchap = SharedPrefManager.getInstance(view.getContext()).getsochap();
        String idchap = SharedPrefManager.getInstance(view.getContext()).getidchap();
        String idtruyen = SharedPrefManager.getInstance(view.getContext()).getIdtruyen();
        new nextChap().execute(idchap,tienchap,idtruyen);
        String trep = SharedPrefManager.getInstance(view.getContext()).getidchap();
        String te = SharedPrefManager.getInstance(view.getContext()).getsochap();
        sochap.setText("Chap "+ te);
        new Apilayanh(this,trep).execute();

     }
}

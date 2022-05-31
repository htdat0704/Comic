package com.example.datotruyen.Adapter;

import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.example.datotruyen.ChapterActivity;
import com.example.datotruyen.Object.Truyen;
import com.example.datotruyen.R;
import com.example.datotruyen.storage.SharedPrefManager;

import java.io.IOException;
import java.util.ArrayList;

import okhttp3.HttpUrl;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;

public class TruyenAdapter extends RecyclerView.Adapter<TruyenAdapter.ViewHolder> {

    ArrayList<Truyen> arrayList;
    Context context;


    public TruyenAdapter(ArrayList<Truyen> arrayList, Context context) {
        this.arrayList = arrayList;
        this.context = context;
    }

    public void sortTruyen(String s){
        s=s.toUpperCase();
        int k=0;
        for(int i=0;i<arrayList.size();i++)
        {
            Truyen truyen = arrayList.get(i);
            String tent = truyen.getTen().toUpperCase();
            if(tent.indexOf(s)>=0){
                arrayList.set(i,arrayList.get(k));
                arrayList.set(k,truyen);
                k++;
            }
        }
        notifyDataSetChanged();
    }
    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        LayoutInflater layoutInflater = LayoutInflater.from(parent.getContext());
        View view = layoutInflater.inflate(R.layout.item_t,parent,false);
        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
        holder.ten.setText(arrayList.get(position).getTen());
        holder.chap.setText(arrayList.get(position).getChap());
        holder.luotxem.setText("Lượt xem: "+arrayList.get(position).getLuotxem());
        Glide.with(this.context).load(arrayList.get(position).getAnh()).into(holder.Anh);

    }

    @Override
    public int getItemCount() {
        return arrayList.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder{
        TextView ten,chap,luotxem;
        ImageView Anh;

        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            luotxem = (TextView)itemView.findViewById(R.id.luotxem);
            ten = (TextView)itemView.findViewById(R.id.ten);
            chap = (TextView)itemView.findViewById(R.id.chap);
            Anh = (ImageView)itemView.findViewById(R.id.anh);

            itemView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    Intent intent = new Intent(v.getContext(), ChapterActivity.class);
                    new Apitanglx(arrayList.get(getAdapterPosition()).getIdt()).execute();
                    SharedPrefManager.getInstance(v.getContext()).saveIdTruyen(arrayList.get(getAdapterPosition()).getIdt());
                    SharedPrefManager.getInstance(v.getContext()).saveNoidung(arrayList.get(getAdapterPosition()).getTxtnoidung());
                    SharedPrefManager.getInstance(v.getContext()).saveTentruyen(arrayList.get(getAdapterPosition()).getTen());
                    SharedPrefManager.getInstance(v.getContext()).savePicture(arrayList.get(getAdapterPosition()).getAnh());
                    SharedPrefManager.getInstance(v.getContext()).saveLike(arrayList.get(getAdapterPosition()).getLikene());
                    SharedPrefManager.getInstance(v.getContext()).saveunLike(arrayList.get(getAdapterPosition()).getUnlike());
                    v.getContext().startActivity(intent);
                }
            });
        }
    }
    public class Apitanglx extends AsyncTask<Void,Void,Void>{

        String idtruyen;

        public Apitanglx(String idtruyen) {
            this.idtruyen = idtruyen;
        }

        @Override
        protected Void doInBackground(Void... voids) {
            OkHttpClient okHttpClient = new OkHttpClient();
            HttpUrl localUrl = HttpUrl.parse("http://192.168.43.231/appandroid/tanglx.php?idtruyen="+idtruyen);
            Request request = new Request.Builder().url(localUrl).build();
            try{
                Response response = okHttpClient.newCall(request).execute();

            } catch (IOException e) {
                e.printStackTrace();
            }

            return null;
        }
    }

}

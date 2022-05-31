package com.example.datotruyen.Adapter;

import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.example.datotruyen.DoctruyenActivity;
import com.example.datotruyen.Object.Chp;
import com.example.datotruyen.R;
import com.example.datotruyen.storage.SharedPrefManager;

import java.io.IOException;
import java.util.ArrayList;

import okhttp3.HttpUrl;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;


public class Chpdapter extends RecyclerView.Adapter<Chpdapter.ViewHolder>{

    Context context;
    ArrayList<Chp> arrayList;

    public Chpdapter(Context context, ArrayList<Chp> arrayList) {
        this.context = context;
        this.arrayList = arrayList;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        LayoutInflater inflater = LayoutInflater.from(parent.getContext());
        View view = inflater.inflate(R.layout.item_chap,parent,false);
        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
        holder.txttap.setText(arrayList.get(position).getTap());
        holder.txtngay.setText(arrayList.get(position).getNgaydang());

    }

    @Override
    public int getItemCount() {
        return arrayList.size();
    }


    public class ViewHolder extends RecyclerView.ViewHolder{

        TextView txtngay,txttap;

        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            txttap = (TextView)itemView.findViewById(R.id.taptap);
            txtngay = (TextView)itemView.findViewById(R.id.ngaya);

            itemView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {

                    String idtruyen = SharedPrefManager.getInstance(v.getContext()).getIdtruyen();
                    Intent intent = new Intent(v.getContext(), DoctruyenActivity.class);

                    SharedPrefManager.getInstance(v.getContext()).saveidchap(arrayList.get(getAdapterPosition()).getIdchap());
                    SharedPrefManager.getInstance(v.getContext()).savesochap(arrayList.get(getAdapterPosition()).getNumbert());
                    v.getContext().startActivity(intent);
                }
            });
        }
    }

}
